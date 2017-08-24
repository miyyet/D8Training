#!/bin/bash

cd "$( dirname "${BASH_SOURCE[0]}" )"
cd ..

source scripts/_environment.sh

ansible-galaxy install -r provisioning/requirements.yml -p provisioning/roles -n -f
ansible-playbook provisioning/provision.yml -i provisioning/inventory/$inventory
