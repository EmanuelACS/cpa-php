### Security Issues
- Check and protect against sql injections 
- Flag if sql injection is attempted
- MySQL vs MySQLi
> Bunny; drop table patients; 

### Security Measures
- Send data and sql in two different statments
- Use: prepare -> bind_param -> execute
    - prepare: Send just sql without the data
    - bind_param: No sql, just raw data to be inserted 
    - execute: 

### Assignment
- Use s for string and date, i for integer and boolean, d for double and b for BLOB.
- Check Database Integration Handout #2 
- Fields have to match question marks (1:1 ratio)
    > $query = "Insert Into $TableName (PetName, Weight, AnimalType) Values (?, ?, ?)";
