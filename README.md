This is code example which describes fix for conflict between Propel $deleted generated model property and existing `deleted` column in table.
Please read more details about problem in article https://pkolomeitsev.blogspot.com/2019/04/symfony-fix-conflict-with-propel-delete.html

# Create table
Create `users` table from existing Doctrine model 

` php bin/console doctrine:schema:update --force `

# Revers-engineering

Build XML schema:
` php bin/console custom-propel:database:reverse `

Build models:
` php bin/console propel:build --classes --verbose `

# Run server
` php bin/console server:start `

Open browser:
http://127.0.0.1:8001 

Results:
```
Analyze table `users`:
- id
- user_name
- user_nick_name
- last_updated
- deleted

Analyze table `user_profile`:
- id
- about_me
- profession
- birth_date
- user_id
```