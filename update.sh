#!/bin/bash

# Start the ssh-agent
eval `ssh-agent -s` 

# Add ssh key
ssh-add /root/.ssh/id_rsa.pub

# Get changes from repo
git pull origin master -force

# Kill the ssh-agent
kill $SSH_AGENT_PID