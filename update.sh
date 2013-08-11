#!/bin/bash

# Start the ssh-agent
eval `ssh-agent -s` 

# Add ssh key
ssh-add /root/.ssh/id_rsa.pub

# Get changes from repo
/usr/bin/git pull origin master

# Kill the ssh-agent
kill $SSH_AGENT_PID