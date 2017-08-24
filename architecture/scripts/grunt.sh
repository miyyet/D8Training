#!/bin/bash

cd "$( dirname "${BASH_SOURCE[0]}" )"
cd ..

source scripts/_environment.sh

ansible webservers-main -i provisioning/inventory/$inventory -m shell -u '{{magento_project_user}}' -a "cd {{magento_source_path}}; grunt ${*:2}"