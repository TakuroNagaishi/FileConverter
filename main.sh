#!/bin/bash

cd `dirname $0`

rm -r Storage/Outputs/
mkdir -p Storage/Outputs/

php create_json_files.php Storage/Inputs/resource.csv
