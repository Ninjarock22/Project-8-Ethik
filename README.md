# Project-8-Ethik

## Projekt Bechreibung
Die vollständige Projektbeschreibung finden sie [hier](https://github.com/Ninjarock22/Project-8-Ethik/blob/main/Project%20Description).

## Projektstatus:
**🛠️In der Entwicklung🛠️**
<br>
## Lizenz:
✅*Keine Lizenz vorhanden*
<br>
## Installation:

**⚠️Die Webseite MUSS auf einem (Lokalen-)Server liegen um PHP und MySQL vollständig ausführen zu können.**

<br>

## Anleitung zur Nutzung mit einem Lokalenwebserver mithilfe von XAMPP

1. ### Nutzung von PHP
    - [Laden](https://www.apachefriends.org/download.html) Sie XAMPP herunter und installieren Sie es
    - Starten Sie dann den Apache Server und legen Sie den Ordner `Project-8-Ethik` (Das -main ist durch umbenennung zu entfernen) im Verzeichnis:`C:\xampp\htdocs` ab
    - Rufen Sie dann im Browser: `localhost/"Ordnername"/"dateiname"."dateiendung"` auf

2. ### Nutzung von MySQL
   2.1 **Falls noch nicht geschehen:** <br>
    - [Laden](https://www.apachefriends.org/download.html) Sie XAMPP herunter und installieren Sie es<br>
    - Starten Sie dann den Apache Server und legen Sie den Ordner `Project-8-Ethik` (Das -main ist durch umbenennung zu entfernen) im Verzeichnis:`C:\xampp\htdocs` ab
    
   2.2 **Einrichten der Datenbank:**
    - Starten Sie zusätzlich den MySQL Server
    - Öfnen Sie anschließend `http://localhost/phpmyadmin/`
    - Erstellen sie nun mit "Neu" eine neue Datenbank mit dem Namen: `ethik-project` mit `utf8_unicode_ci`
    - Wählen Sie nun am linken Rand die erstellte Datenbank aus und wählen Sie oben den Reiter *Importieren*
    - Importieren Sie die Datei: `users.sql.gz` und bestätigen das ganze mit *ok*
    - ⚠️ Es sollte nun zu **keiner** Fehlermeldung kommen. Sollte dennoch eine Fehlermeldung auftreten, melden Sie dies bitte [hier](https://github.com/Ninjarock22/Project-8-Ethik/issues)
    - Rufen Sie dann im Browser: `../public/index.html` auf

4. ### Anschließend sollte die Webseite angezeigt werden und durch die Nutzung des Login/Sign-up Systems möglich sein
    - Standard Account für Anmeldung:<br>
        E-Mail: test@test.de <br>
        ⚠️ **(KEINE echte E-Mail Adresse)** ⚠️ <br>
        Passwort: testtest<br>
        (Erstellen Sie dann einen Neuen Zugang und löschen den Standardzugang um die Sicherheit zu gewährleisten)<br>
        (Löschen nur via Datenbank möglich in diesem Programm)
        <br>
        <br>
<br>
<br>
   ©2025 Philipp Uhlendorf, Johann Behling
