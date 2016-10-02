# webtools
An opinionated version of tools for HUBzero. Tool development from a web developer's perspective.

# Installation
 1. Get a working HUBzero instance up and running (download the open source release from https://hubzero.org/download)
 1. Copy these files into `<webroot>/app/components/com_webtools`
   - `git clone https://github.com/kevinwojo/webtools com_webtools` from app/components/.
 1. Run `muse extension add com_webtools`.

# Goals
 1. Developers simply post their GitHUB repo URL, the application takes care of the rest.
 1. API-first development. 
 1. Single Page User Interface.
  - Adding a repo is simple.
  - Tool maintance operations are in-line (app maintainer: review, reject, install)
  - User has limited number of repos to start off, can request more (integration with NanoHUB pro??)
  - 

# Projected Workflow
 1. Copy/paste github repo URL into app
 1. Application clones the repo locally
 1. User supplies build information (how to turn it into a HUBzero tool).
 1. Code is reviewed -> feedback to developer from HUBzero app maintainer
 1. Code review passed? -> App Maintainer installs into /app directory
 1. Code review failed? -> Developer notified via HUBzero (email and/or commenting functionality)
   - Repeat until the thing passes
 
# Extended Goals
These are secondary goals which I would like to achieve after getting the inital interface running.

## Integrations
 1. Projects - access repository space from within a project.
 1. Publications - once installed, have a pointer to the current version of code, collect metadata, publish tool.
 1. Resources - (similar to publications)
 1. Slack integration
  - Approve, comment, notify
  1.  ???? Open to suggestions!

## Statistics
 Rudimentary tool statistics will be made available in the first iteration:
 1. How many times was the tool requested to be ran?
 1. How many changes were made in the past year?
 1. When was the tool last updated?
 1. How many times the "build" has failed?

