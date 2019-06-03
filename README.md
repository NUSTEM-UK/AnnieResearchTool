# PrimaryResearchTool

Primary research tool to improve data collection for the NUSTEM team. The components include:
  - Job aspirations tool to help capture levels of understanding
  - Most like a scientist tool to help compare children's interpretations of themselves
  - A download site to request data

## Requirements

TODO: Ivan

## Bringing the system up

TODO: Ivan. Tell me about `careersinsert.php` and any other steps needed to start from scratch.

## System overview

TODO: Ivan. Describe the directory tree, what each component does, and what the entry points are.

## Customisation

TODO: Ivan. How would one:
- Amend the schools list in the drop-down (affects UID creation)
- Change careers lists
- Separate the two tools so we could run one or the other rather than chaining both (give pointers here)

### ID Creation

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
