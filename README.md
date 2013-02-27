htauth-self-service
===================

Need to create users for http authentication?  Look no further!

DISCLAIMER
==========

 This program calls out to htpasswd on the backend.  This presents a possible security hole!
Protect it with auth and anything else you find relevant for preventing data loss or corruption.

Overview
========

Adding a mess of users into httpauth is annoying.  Why not spread the love by giving everyone a nice interface to do it themselves?

Development Plan
================

This project is very much in development.  The plan is as follows.

 * create an interface that can submit a username and password to htpasswd
 * update a group and place it into a group file
 * scan that group file for existing group names and present them on the form
 * allow users to be added to those groups
