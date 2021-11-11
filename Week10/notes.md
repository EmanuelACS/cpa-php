### Interchangable names
```
attribute = class variable = data member = property
method = property =
class = blueprint of an object
```

### Method
> Make evertyhing private until you can't
> Cannot overload functions
    > But you can use optional parameters 
> Calling a moethod: $objName->methodName

### Constructor / Destructor
> Const: Automatically called when obj created
> Dest: Automatically called when obj destroyed  

### this keyword
> $this refers to current object
> refer to an attribute or a method in the class using it

```Always save valid data to parameters```

### public / private
> make everything private unless you are forced to do otherwise 
> private: only class can access it
> public: any object can access it
> access modifier simply means public/private/protected

### Readonly Attributes
> Provide a public get and no set 
> Provide a public get and private set

### Inheritance
> IsA relationship example:
Vehicle -> Transport Truck
Vehicle -> School Bus
> SchoolBus IsA Vehcile
> TransportTruck IsA Vehicle
```
Vehicle is the superclass/baseclass/parentclass
Transport/Schoolbus is the subclass/derivedclass/childclass
```

#### Setup
- Vehicle would hold all attributes+properties+methods common to all vehicles
    - Transport would hold                  ''                trasport trucks
    - SchoolBus would hold                  ''                school busses

### Abstract keyword
- Abstract classes -> can't create an object of the parent, just subclasses (specific)
> Example
```
abstract class clsVehicle {
    ...
    ...
    ...
}

class car {
    public function __construct($pSize, $pModel, $pPrice) {
        parent::_construct($pModel, $pPrice);
    }
    ...
    ...
    ...
}
```

### Abstract Methods
> For similar functions but that have different checks for each class
> For example, this means that each child class has to code that method
```
abstract pubilc function securityCheck();  
```

### Modifiers
> Protected: child has access
> Private: only class has access
> Public: all have access
