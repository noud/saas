SELECT 
infix AS additional_name,
dateofbirth AS birth_date,
email,
lastname AS family_name,
firstname AS given_name,
mobile AS telephone
FROM `contact`;

-- INTO OUTFILE '/var/lib/mysql-files/person.csv'
-- FIELDS TERMINATED BY ','
-- ENCLOSED BY '"'
-- LINES TERMINATED BY '\n';

-- --secure-file-priv