### Security Issues
- Check and protect against sql injections 
- Always assume data came from the user
- Flag if sql injection is attempted
- MySQL vs MySQLi
> Bunny; drop table patients; 

### Security Measures
- Send data and sql in two different statments
- Use: prepare -> bind_param -> execute
    - prepare: Send just sql without the data
    - bind_param: No sql, just raw data to be inserted 
    - execute: Send values to the server

### Assignment
- Use s for string and date, i for integer and boolean, d for double and b for BLOB.
- Check Database Integration Handout #2 
- Fields have to match question marks (1:1 ratio)
    > $query = "Insert Into $TableName (PetName, Weight, AnimalType) Values (?, ?, ?)";

    > $stmt = $mysqlObj->prepare($query);
- 3 bytes, 3 types (1:1 ratio), order matters!
    > $BindSuccess = $stmt->bind_param("sds", $userName, $userWeight, $userAnimalType);
- At the execute stage, send 3 values to the server
    > $CreateResult = $stmt->execute();

### MySQLi classes
> $obj

### File Pointers
- Points to start of file when opened file
- While loop until eof
- Read first line, file pointer then points to second line, and so on
- Moves file pointer to the end 
- File looks at fileptr position, if at end of file marker, stop the while loop
- File corruption: eof marker gets erased, so reads until runs out of memory
- MySQL and php work in a similar way.
    - Has record pointer that keeps track of position
