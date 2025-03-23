const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const jwt = require('jsonwebtoken');
const path = require('path');

const app = express();
app.use(bodyParser.json());

const SECRET_KEY = "your_secret_key"; // Replace with a secure secret key
const TOKEN_EXPIRY = "1h"; // Token validity period
const usersCSV = path.join(__dirname, 'users.csv');

// Helper function to read user data from CSV
function readUsersFromCSV() {
    const data = fs.readFileSync(usersCSV, 'utf8');
    const lines = data.trim().split('\n');
    return lines.slice(1).map(line => {
        const [username, password, email, fullName, age, status, ip] = line.split(',');
        return { username, password, email, fullName, age, status, ip: ip || '' };
    });
}

// Helper function to write user data back to CSV
function writeUsersToCSV(users) {
    try {
        const headers = "username,password,email,fullName,age,status,ip";
        const lines = users.map(user => `${user.username},${user.password},${user.email},${user.fullName},${user.age},${user.status},${user.ip}`);
        fs.writeFileSync(usersCSV, [headers, ...lines].join('\n'), 'utf8');
    } catch (error) {
        console.error('Error writing to CSV:', error);
    }
}

// Middleware to verify JWT tokens
function authenticateToken(req, res, next) {
    const authHeader = req.headers['authorization'];
    const token = authHeader && authHeader.split(' ')[1];
    if (!token) return res.sendStatus(401);

    jwt.verify(token, SECRET_KEY, (err, user) => {
        if (err) return res.sendStatus(403);
        req.user = user;
        next();
    });
}

app.use(express.static(path.join(__dirname, 'public')));

// Endpoint for user login
app.post('/login', (req, res) => {
    const { username, password } = req.body;
    const users = readUsersFromCSV();
    const user = users.find(u => u.username === username && u.password === password);

    if (!user) {
        return res.status(401).json({ message: 'Invalid username or password' });
    }

    const ipAddress = req.headers['x-forwarded-for'] || req.connection.remoteAddress;

    // Update IP in the CSV database
    const updatedUsers = users.map(u => 
        u.username === username ? { ...u, ip: ipAddress } : u
    );
    writeUsersToCSV(updatedUsers);

    // Generate JWT token including IP address
    const token = jwt.sign(
        { username: user.username, email: user.email, fullName: user.fullName, age: user.age, status: user.status, ip: ipAddress },
        SECRET_KEY, 
        { expiresIn: TOKEN_EXPIRY }
    );

    res.json({ token, message: 'Login successful', ip: ipAddress });
});

// Endpoint to update user profile
app.post('/updateUser', authenticateToken, (req, res) => {
    const { email, fullName, age, status } = req.body;
    const users = readUsersFromCSV();
    const userIndex = users.findIndex(u => u.username === req.user.username);

    if (userIndex === -1) {
        return res.status(404).json({ message: 'User not found' });
    }

    users[userIndex] = { ...users[userIndex], email, fullName, age, status };
    writeUsersToCSV(users);
    res.json({ email, fullName, age, status });
});

// Endpoint to view and edit CSV file (Admin only)
app.get('/admin/viewCSV', authenticateToken, (req, res) => {
    if (req.user.status !== 'admin') {
        return res.status(403).json({ message: 'Access denied' });
    }

    const data = fs.readFileSync(usersCSV, 'utf8');
    res.json({ csvData: data });
});

app.post('/admin/editCSV', authenticateToken, (req, res) => {
    if (req.user.status !== 'admin') {
        return res.status(403).json({ message: 'Access denied' });
    }

    const { updatedCSV } = req.body;
    fs.writeFileSync(usersCSV, updatedCSV, 'utf8');
    res.json({ message: 'CSV file updated successfully' });
});

// Server setup
app.listen(8080, () => {
    console.log('Server is running on port 8080');
});

// Endpoint for user signup
app.post('/signup', (req, res) => {
    const { username, email, password } = req.body;

    console.log('Signup request received:', { username, email, password }); // Debug log

    if (!username || !email || !password) {
        console.log('Validation failed: Missing fields'); // Debug log
        return res.status(400).json({ message: 'All fields are required' });
    }

    const users = readUsersFromCSV();
    console.log('Existing users:', users); // Debug log

    const userExists = users.some(u => u.username === username || u.email === email);
    if (userExists) {
        console.log('Validation failed: User already exists'); // Debug log
        return res.status(409).json({ message: 'Username or email already exists' });
    }

    const newUser = {
        username,
        password,
        email,
        fullName: '',
        age: '',
        status: 'user',
        ip: ''
    };
    users.push(newUser);

    console.log('New user added:', newUser); // Debug log

    writeUsersToCSV(users);

    res.status(201).json({ message: 'User registered successfully' });
});

