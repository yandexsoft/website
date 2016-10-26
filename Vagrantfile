# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/xenial64"

  config.vm.network "forwarded_port", guest: 8000, host: 8000

  config.vm.synced_folder ".", "/home/ubuntu/website", create: true

  config.vm.provision "shell", inline: <<-SHELL
    # install php packages
    sudo apt install -y php7.0-cli php7.0-curl php7.0-intl php7.0-json php7.0-sqlite php7.0-mbstring php7.0-xml composer

    # install node packages
    sudo apt install -y nodejs-legacy npm

    # Install node modules
    cd /home/ubuntu/website
    npm install --no-bin-links
    npm run build

    # Create a small script to install npm deps, run build, and serve content
    echo "
#!/bin/bash
cd /home/ubuntu/website
npm install --no-bin-links
npm run build
/usr/bin/php -S 0.0.0.0:8000 router.php
" > /home/ubuntu/website.sh

    # Create a systemd service to run the script
    echo "
[Unit]
Description=Runs PHP server for elementary website

[Service]
ExecStart=/home/ubuntu/website.sh
Type=simple

[Install]
WantedBy=multi-user.target
" > /etc/systemd/system/website.service

    # Enable for after reboot and start it now for the greedy
    sudo systemctl enable website
    sudo systemctl start website
  SHELL
end
