# webtools
An opinionated version of tools for HUBzero. Tool development from a web developer's perspective.

# Goals
 1. Developers simply post their GitHUB repo URL, the application takes care of the rest.
 1. API-first development. 
 1. Single Page User Interface.

# Projected Workflow
 1. Copy/paste github repo URL into app
 1. Application clones the repo locally
 1. User supplies build information (how to turn it into a HUBzero tool).
 1. Code is reviewed -> feedback to developer from HUBzero app maintainer
 1. Code review passed? -> App Maintainer installs into /app directory
 1. Code review failed? -> Developer notified via HUBzero (email and/or commenting functionality)
   - Repeat until the thing passes
 
 Rudimentary tool statistics will be made available in the first iteration:
 1. How many times was the tool requested to be ran?
 1. How many changes were made in the past year?
 1. When was the tool last updated?
 1. How many times the "build" has failed?

