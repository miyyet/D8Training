#!/bin/bash

cd "$( dirname "${BASH_SOURCE[0]}" )"
cd ..

USAGE_ADDITIONAL_PARAMETER="[-m] [-h]"
USAGE_ADDITIONAL_HELP=$(cat <<EOF
    -m|--modules Install Drupal contrib modules
    -h|--help    This help

EOF
)

EXTRA_VARS=""
INSTALL_MODULES="N"

source scripts/_environment.sh

# Retrieve params
while [ "$2" != "" ]; do
    case $2 in
        -m | --modules)         INSTALL_MODULES='Y'
                                ;;

        -h | --help )           usage
                                exit
                                ;;

        * )                     usage
                                exit 1
    esac
    shift
done

# Database warning
echo ""
echo "Launch the install process ?"
echo "   WARNING: it will erase the current database if it already exists"
read -p "   [y,n]: " confirm
echo
confirm=$(echo ${confirm} | tr 'A-Z' 'a-z')
if [ "${confirm}" != "y" ]; then
    echo "  Aborted by user"
    exit 1
fi

if [ "${INSTALL_MODULES}" == "Y" ]; then
    EXTRA_VARS="${EXTRA_VARS} install_modules=Y"
fi

ansible-playbook provisioning/install.yml -i provisioning/inventory/$inventory -e "${EXTRA_VARS}"
