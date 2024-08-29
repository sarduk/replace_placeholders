# replace_placeholders

A script that replaces placeholders in file and directory templates with specified values and outputs the customized version.

# Signature
php replace_placeholders.php [OPTIONS] {path_input} {path_file_placeholders} {path_dir_output}

# ARGUMENTS
	path_input
	path_file_placeholders
	path_dir_output

# OPTIONS
  --help  display help page

# Description
The script takes as input a directory (referred to as "template") or a single file. Within this directory or file, there may be placeholders in both the file/directory names and their contents.

**Input:**
1. **Template:** This can be a parent directory or a single file. The files within the directory, or the file itself, may contain placeholders format {placeholder} in both their names and content.
2. **Array of key-value strings:** A list that associates placeholders with the values to replace them. Each element of the array is in the form `<placeholder, replacement_value>`.
3. **Output Path:** The destination where the modified file or directory should be saved.

**Functionality:**
- The script reads the structure of the template, which can be a directory containing other files and subdirectories, or a single file.
- For each file and directory found, the script searches for placeholders in their names and replaces them with the corresponding values from the key-value list.
- The script opens each file (if applicable) and replaces any placeholders format {placeholder} found within the content with the corresponding values.
- The resulting structure, with the placeholders replaced, is copied to the destination specified by the "output path."

**Output:**
- A copy of the input directory or file, with all placeholders replaced by the specified values, is created at the specified output path.

---

This script is useful for generating customized files or directories based on a predefined template, offering a high degree of automation and flexibility.

---

# Example

---
/path/dir/input/

├── Controllers/
│       └── {Entityname}Controller.php

file content
<?php class {Entityname}Controller{}

├── Models/
│       └── {Entityname}.php

file content
<?php class {Entityname}{}

---

placeholders.txt

entityname = user
entitynames = users
Entityname = User
Entitynames = Users

---

run script

$ php replace_placeholders.php /path/dir/input/ /path/file/placeholders.txt /path/dir/output/

RESULT

/path/dir/output/

├── Controllers/
│       └── UserController.php

file content
<?php class UserController{}

├── Models/
│       └── User.php

file content
<?php class User{}

