#!/bin/bash
cd ~
wget http://security.ubuntu.com/ubuntu/pool/main/a/apt/apt_1.8_amd64.deb
sudo dpkg -i apt_1.4_amd64.deb
sudo apt-get supervisor -y