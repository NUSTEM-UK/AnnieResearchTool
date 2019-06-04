# PrimaryResearchTool

Primary research tool to improve data collection for the NUSTEM team. The components include:

- Job aspirations tool to help capture levels of understanding
- Most like a scientist tool to help compare children's interpretations of themselves
- A download site to request data

## Requirements

- Runs on a MySQL and PHP capable server
- Includes JQuery and the Google Speech Synthesis API
- Utilizes Interact.js to implement dragging feature

## Bringing the system up

- Use `InteractiveCardsWebAppSQL.txt` to set up the necessary SQL infrastructure
- Run the `careersinsert.php` script to initialize the careers list for dynamic updates later
- Ensure each of the subfolders has a version of `connect.php`

## System overview

The project is split into 3 different directories:

- `scgames` contains the main web app used for research purposes in schools, accessible at [nustem.uk/r/scgames](https://nustem.uk/r/scgames/)
- `psct` is an instance of the main app for the purposes of displaying its use to potential interested parties accessible at [nustem.uk/r/psct](https://nustem.uk/r/psct/) - **currently WIP**
- `drs` is the download app, it will display the links to download `.csv` files from the database
- `careersinsert.php` inserts a list of careers into the *careers_list* table
- `InteractiveCardsWebAppSQL.txt` contains all SQL statements necessary to set up database

## Customization (WIP)

TODO: Ivan. How would one:

- Amend the schools list in the drop-down (affects UID creation)
- Change careers lists
- Separate the two tools so we could run one or the other rather than chaining both (give pointers here)

## ID Creation

Components to make up ID:

- First name
- Last name
- Birth day
- Birth month
- School identifier

Encoding procedure:

- First name initial as number from 00 to 25
- Last name initial as number from 00 to 25
- Birth day as number from 01 to 31 (becomes "00" if no data is entered)
- Birth month as number from 01 to 12 (becomes "00" if no data is entered)
- School identifier based on the current system in use composed of 4 digits

Creates a 12 digit identifier.

TODO: Ivan. Point to name / function where this is created.
