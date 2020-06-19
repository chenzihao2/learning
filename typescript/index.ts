function demo() {
    var a = 1;
    let b = 2;
    if (a) {
        let c = 3;
    }
    //console.log(c); //let 块区域内有效 error
}
enum color {
    red=3, green, yellow
};
let c = color.red;
class Animal {
    static names:string;
    static eat(value:string):void {
        console.log(`${this.names}` +'吃'+ `${value}`);
    }
}
//Animal.names = 'dog';
//Animal.eat('met');
interface StringArr {
    [index:number]:string
}

function demoT<T>(params:T):T {
    return params;
}
demoT<string>('123');
//mysql 数据访问层封装
interface Data<T>{
    Add(info:T):boolean;
    Delete(info:T):boolean;
    Update(info:T):T;
    Search(info:T):T;
}

class Da<T> implements Data<T>{
    Add(info:T):boolean {
        return undefined;
    }
    Delete(info:T):boolean {
        return undefined;
    }
    Delete(info:T):boolean {
        return undefined;
    }
}

class UserInfo {

}

class UserData extends Da<userInfo> {
    this.Add
}
console.log(c);
