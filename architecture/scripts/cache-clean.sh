#!/bin/bash

cd "$( dirname "${BASH_SOURCE[0]}" )"
cd ..

source scripts/_environment.sh

ansible-playbook provisioning/cache-clean.yml -i provisioning/inventory/$inventory
