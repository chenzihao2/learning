class minClass {
    public list:number[] = [];
    add(num:number){
        this.list.push(num);
    }
    min():number{
        var minNum = this.list[0];
        for(var i=1; i < this.list.length; i++) {
            if (minNum > this.list[i]) {
                minNum = this.list[i];
            }
        }

        return minNum;
    }
}
var m = new minClass();
m.add(1);
m.add(10);
m.add(100);
m.add(12);
console.log(m.min());
