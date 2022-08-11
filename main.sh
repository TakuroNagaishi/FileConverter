#!/bin/bash

cd `dirname $0`

# Initialize output directry
rm -r Storage/Outputs/
mkdir -p Storage/Outputs/

# Execute
php create_json_files.php Storage/Inputs/resource.csv

echo -e "\e[32mConverting was completed successfully.\e[m"
