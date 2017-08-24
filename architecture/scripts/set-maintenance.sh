#!/bin/bash

cd "$( dirname "${BASH_SOURCE[0]}" )"
cd ..

USAGE_ADDITIONAL_PARAMETER="[status]"
USAGE_ADDITIONAL_HELP="\tstatus : enable/disable\n"

source scripts/_environment.sh

ansible-playbook provisioning/set-maintenance.yml -i provisioning/inventory/$inventory -e "status=$2"
