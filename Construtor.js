
//começa com prototipaçao
class Person {
    constructor(first, last) {
        // property and method definitions
        this.first = first;
        this.last = last;
        //...
    }
}

const person1 = new Person('Bob', 'Smith');

person1.valueOf();
/*
//construtor 
person1.constructor
//person2.constructor

const person1 = new Person('Bob', 'cu');

const person3 = new person1.constructor('Karen', 'Stephenson');

//para acessar as pessoas a partir do construtor 
person3.name.first
person3.age
person3.bio()

person1.constructor.name
*/