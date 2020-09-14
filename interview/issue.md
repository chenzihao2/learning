#### CLI模式下的生命周期
php_module_startup      模块初始化
php_request_startup     请求初始化
php_execute_script      脚本执行阶段
php_request_shutdown    请求关闭
pho_module_shutdown     模块关闭



####PHP内存分配流程
Zend内存管理器，当需要用到内存的时候不会直接向系统申请，而是通过zend内存管理器的函数，如果zend中有可用内存则直接使用，否则才向系统申请;
zend管理器会先向系统申请大块内存，然后按照一定的规则分割成较小的内存块，由内存池统一管理，当有内存申请时从池子中匹配合适大小的内存返回;
写时复制COW



####GC 的出现是为了解决什么问题？什么时候会触发 GC？说下大概流程
GC合理回收内存，解决内存溢出的问题
当一个php线程结束之后所有占用的内存空间都会被销毁
执行unset或者__destruct()
PHP 会根据全局变量 session.gc_probability 和session.gc_divisor的值，来决定是否启用一个GC, 在默认情况下， session.gc_probability=1, session.gc_divisor =100 也就是说有1%的可能性启动GC

引用计数
php将变量存储在zval容器中，除了存储值和类型以外，还字段记录指向变量的元素个数，当为0的时候就回收此变量





####php数组是怎么实现的
通过hashtable实现的一种keys关联到values的有序映射



####php-fpm 创建 worker 进程的规则是什么
1 ondemand
按需创建，当有请求过来才创建

2 dynamic
有进程最大值，最多创建那么多，根据请求数量动态变化，初始创建最小值个

3 static
固定创建最大值对应的进程数


####Mysql优化
单表优化 、字段、
使用timestamp而非datetime
单表字段不要太多
尽量不要使用NULL
IP用int保存 ip2long

索引、
合理建立索引， 在where子句的列或者orderby的列
联合索引注意查询顺序
删除没有必要的单列索引


查询SQL、
尽量避免在sql中做运算或者调用函数
将大的sql拆分成小的sql
用in(logn)代替or(n)  
尽量少使用select *
尽量少使用模糊查询
尽量少使用where in 或者 !=  因为可能不会命中索引
拿数据limit,加最大id限制

存储引擎、
升级硬件、
读写分离、
缓存、
分表分区、
使用NoSQL等





####MySQL事务隔离级别
事务隔离级别	                脏读	不可重复读	幻读
读未提交（read-uncommitted）	是	    是	        是
读不会加锁，但是写会加排它锁

读提交（不可重复读)（read-committed）	否	    是	        是
写数据使用排它锁， 读的时候使用MVCC(多版本并发控制)机制， 所以不可以重复读且会幻读

可重复读（repeatable-read）	    否	    否	        是          默认
MVVC + next key locks 阻止了大部分的幻读但是还是会幻读(innodb阻止了幻读)

串行化（serializable）	        否	    否	        否
读写都加互斥锁


脏读    一个事务中读到了另一个事务修改或新增但是未提交的数据
幻读    一个事务中读取到了另一个事务新插入的数据
不可重复读  一个事务中某次数据的读取只能读一次，因为其他事务对其进行了修改(针对读过的数据)


####Linux命令查找出日志文件中访问量最大的10个ip
cat ip | awk -F '{print $2}' | sort -r | uniq -c


####php 和 mysql 的通信机制(长连接和短连接)
当一个php进程连接到mysql的时候就算建立了一次连接
短连接在请求完成之后就会自动关闭
长连接则会一直存在直到得调用close,或者进程死掉
fpm的进程数应该小于mysql的最大连接数



####依赖注入
本来是通过获取参数在本类内部实现一个外部对象的实例化，现在直接传入一个已经实例化好的对象



####innodb索引数据结构
B+tree 
b-tree的所有节点都用来存储键值对或者值，b+tree只有在叶子节点才会存储数据, 其他节点只存储key， 各个叶子节点中间通过双向链表进行链接，这样减少了树高 减少了IO



####redolog/undolog/binlog 的区别
redolog
保证事务的持久性，在事务还未提交之前保存最新的数据备份，redolog持久化之后可以系统奔溃的时候将数据恢复到最新的状态

undolog
保证事务的原子性，保存事务未提交的状态，在事务失败或者回滚时候利用undolog恢复数据

binlog
主从同步数据，最大可能的恢复数据库



####用 redis 怎么实现一个延时队列？
利用zset,   讲score存储为对应执行时间的时间戳， 轮询zset, 当score <= 当前时间戳的时候就取出来执行



####布隆过滤器
布隆过滤器是由一个很长的二进制向量和一系列随机映射函数组成。它可以用于检索一个元素是否在一个集合中。它的优点是空间效率和查询时间都远远超过一般的算法，缺点是有一定的误判。





####redis的淘汰策略
allkeys-lru 优先删除最近使用最少的key
如果业务分为热数据和冷数据的建议使用，或者没有具体的业务特征的

allkeys-random  随机的删除所有的key
如果需要循环读所有的key或者大部分key的访问频率都差不多的时候建议使用

volatile-ttl    根据expire的剩余时间进行删除
(expire会消耗内存，如果使用allkeys-lru则可以所有key都不设置过期时间)





####tcp三次握手和四次挥手
三次握手
1 客户端发送给服务器， 表明请求连接服务端
2 服务端返回给客户端确认包，表示可以建立连接
3 客户端接收到服务端的确认包后返回确认包，连接建立

当第一次握手因为网络原因没有及时发送给服务端的时候，会再次发送一次请求，通过第三次握手来防止建立多次连接

四次挥手
1 客户端发送关闭连接的请求到服务端 此时客户端仍可接收数据
2 服务端接受到关闭连接请求，返回给客户端准备开始关闭连接，但是仍可发送数据
3 服务端准备关闭连接，并发送给客户端
4 客户端接收到关闭连接请求之后发送给服务端确认信息， 服务端关闭连接，客户端保持接收数据状态，待没有数据之后客户端关闭



####select poll epoll 的区别
select O(n)
只是知道有事件要发生，但是不知道是哪个流或者哪几个流，只能无差别轮询所有流，找到需要读或者写的流数据进行操作

poll O(n)
与select没有太大的区别, 但是没有最大连接数限制

epoll O(1)
event poll 会把哪个流发生了I/O事件通知我们，所以说是事件驱动

都是I/O多路复用（同时监听多个描述符，一旦有I/O操作便会去执行）
都是同步I/O




####阻塞，非阻塞，同步，异步
阻塞
在调用结果返回之前，程序将一直等待结果返回，直到结果返回后才会继续向下执行

非阻塞
在不能立刻获取到调用结果的时候不会进行等待，而是直接向下执行

同步
程序执行过程中上一步没有返回结果的情况不会执行下一步

异步
程序执行过程中下一步执行和上一步没有关系


同步和阻塞的区别

同步在没有得到调用结果的时候程序虽然看似进入等待状态，其实是cpu仍在执行对应程序
阻塞是指在没有得到调用结果的时候程序已经不在执行状态


####swoole
Swoole 是一个 PHP 的 协程 高性能 网络通信引擎，使用 C/C++ 语言编写，提供了多种通信协议的网络服务器和客户端模块。可以方便快速的实现 TCP/UDP服务、高性能Web、WebSocket服务、物联网、实时通讯、游戏、微服务等，使 PHP 不再局限于传统的 Web 领域。



####假设现在有人操作数据库，不小心执行错了语句，误删除了很多数据，这时候能恢复吗？
如果开启了bin_log日志的话 可以恢复，而且需要bin_log日志的记录格式是row而非statement, 根据日志中执行过的删除行的语句进行恢复
(因为statement只会记录对应的sql语句，并不能记录真实的数据内容，所以无法恢复)


####主从延迟的情况，怎么处理
1 如果是主从服务器的配置不一样，从服务器差点，增加从服务器的配置
2 如果从库读压力过大，可以增加几台从库分摊压力
3 尽量减少大事务的操作，将大事务分摊成小的事务
4 配置多进程从复制



####索引下推
使用索引下推的时候， mysql服务器会将判断条件传给引擎层，引擎通过扫描索引判断符合条件的直接返回给mysql服务器，减少一部分I/O

索引条件下推优化可以减少存储引擎查询基础表的次数，也可以减少MySQL服务器从存储引擎接收数据的次数



####try catch finally
finally一定会执行



####php如何执行shell脚本，如何开启配置
exec()  system() 等函数
需要safe_mode = off 关闭安全模式， disable_functions 禁用函数列表里去掉




####一个请求的全部流程
浏览器发出请求 =>   如果浏览器有缓存，直接返回 => 通过dns解析域名获取到ip => ip通过arp和rarp协议找到对应服务器  => 向对应服务器发出http请求建立tcp连接
=> 静态资源的话如果有服务器缓存直接返回，没有则返回对应页面  => 动态请求通过web服务器调用对应的cgi程序 => php-fpm监听到对应请求，并又master分发至worker执行
=> php执行对应脚本 => 如果有命中缓存层则返回缓存 => 否则请求数据库获取数据并返回





####innodb 和 myisam区别
myiasm的主索引和辅助索引在结构上没有区别，innodb的辅助索引依赖于主索引
innobd支持事务 行级锁
myisam可以没有主键
都是b+tree索引



####一张表最多建立多少个索引
64位系统 mysql5.0之后 每个表最多可以建立16个索引， 每个索引的长度最大为256字节



####聚簇索引 非聚簇索引 和 回表
聚簇索引    一般是指主键
非聚簇索引  普通索引
回表        先通过普通索引定位到聚簇索引 然后再通过聚簇索引找到对应数据记录  需要扫描两遍b+tree

innodb 的B+tree索引分为主索引和辅助索引，主索引的叶子节点中存放着完整的数据记录，称为聚簇索引，辅助索引的叶子节点中记录着主键的值, 所以需要先通过找点主键的值在定位数据

####innodb为什么非要有主键
如果表没有定义主键，则选择第一个非null的唯一索引作为聚簇索引， 如果这样的索引都没有的话，innodb会自动生成隐藏的row_id列作为聚簇索引
row_id是隐藏的不好管理





#### array_merge   ||  + || array_merge_recursive
array_merge 如果key为字符串，则相同的key会进行覆盖， 后面的覆盖前面的值， 如果是key为int，  则后面的会自增累加
+           不论key是字符串还是数字， 如果重复的话都会只保留最开始的那个值
array_merge_recursive   相同key的会组合成二维数组



#### redis主从同步的原理
主从复制两种方式
全量复制和增量复制

全量复制
slave发送sync命令至master
master接收到sync命令后，执行bgsave生成rdb快照并将接下来的指令记录到缓冲区
master将rdb快照发送给salva,并且持续将指令记录到缓冲区
master发送rdb快照之后向slave发送缓冲区对应记录
slvae接收master生成的rdb快照并且丢弃所有的数据进行快照重写, 并执行缓冲区命令, 开始接收来自master的指令
全量复制开销
master执行bgsave
rdb文件传输
slave清空数据
slave执行rdb
slave会aof重写

增量复制(2.8之后)
master会维护一个复制缓冲区，和一个runid和偏移量
slave会周期性的确认自己的每次的复制量
当slave再次连接到master的时候如果runid一样并且偏移量在缓冲区内，则会根据offset进行同步
如果主服务器重启了则只会全量复制因为runid改变
使用psync(异步)代替sync(同步)

两种配置方式
1 直接在cli方式下执行 slave of 无需重启，
2 在配置文件中修改， 需要重启





#### 类的反射机制
new \ReflectionClass('类名') 即可建立类的反射
通过类的反射可以获取类中所有的属性或者方法
可以获取到命名空间
可以获取到注释
可以执行类的方法
可以实例化这个类
可以修改当前反射类实例的成员属性 , 并不能修改类本身的成员属性

#### 属性，方法， 类， 实例
属性属于对象
静态属性属于类
方法属于类

#### cpu消耗很高但是内存不高  查看哪个cpu负载高
top界面中按1查看各个cpu消耗情况
top页面可以增加列， 其中p对应的列是某个线程所使用的cpu编号

#### http请求抓包内容
http请求
请求行(开始行)
    method  url  http版本
首部行（头）
    host, content-type
内容实体

http返回
返回行
http版本  状态码
首部行
内容实体

#### php数组实现原理
hashtable 将不同的关键字映射到不同数据单元的一种数据结构 而实现这种映射关系的方法就叫做散列函数, 在关键字和数据单元足够多的情况下，可能会出现多个关键字映射到同一个数据单元的问题(hash冲突)， 解决办法是增加链表
基于散列表(hashtable) ，  包括存储元素数组，散列函数
php的数组是有序， 因为散列表在散列函数和元素数组之间增加了一个映射表，用于保存存储元素的下标
hashtable + 链表    解决hash冲突

#### hash 数组  链表
数组   编程语言概念  增加和减少数组比较麻烦  但是查找很快 O(1) 根据下标
链表   数据结构概念  增加和减少元素很简单   但是读数据较慢
hash   数据结构概念  数组和链表的结合


#### http请求为什么会在网络慢的情况下阻塞
可能是因为http会有重复请求，失败重新请求



#### mysql强制索引和禁止某个索引


1、mysql强制使用索引:force index(索引名或者主键PRI)

例如:

select * from table force index(PRI) limit 2;(强制使用主键)

select * from table force index(ziduan1_index) limit 2;(强制使用索引"ziduan1_index")

select * from table force index(PRI,ziduan1_index) limit 2;(强制使用索引"PRI和ziduan1_index")



2、mysql禁止某个索引：ignore index(索引名或者主键PRI)

例如:

select * from table ignore index(PRI) limit 2;(禁止使用主键)

select * from table ignore index(ziduan1_index) limit 2;(禁止使用索引"ziduan1_index")

select * from table ignore index(PRI,ziduan1_index) limit 2;(禁止使用索引"PRI,ziduan1_index"

# mysql多个单列索引联合使用
多个单列索引在多条件查询时优化器会选择最优索引策略，可能只用一个索引，也可能将多个索引全用上！ 但多个单列索引底层会建立多个B+索引树，比较占用空间，也会浪费一定搜索效率，故如果只有多条件联合查询时最好建联合索引！



####mysql表分区
数据库把一个表分解成多个更小的更适合管理的部分，每个分区都可以作为一个独立对象处理，不影响业务逻辑
分区物理上还是一张表
range分区， list分区， hash分区， key分区




####依赖注入和控制反转
在一块处理逻辑中需要用到另外的类的对象的时候， 不在本逻辑中进行实例化， 而且是直接传入该类的实例，写法上一般是传入参数前写上对应类的父类， 依赖注入实现了控制反转





####索引建立原则
where, order by 的子句
字段长度不能太长
字段内容比较分散，选性高
经常需要与其他表联查的时候的关联字段
在要搜索的列上加索引



####什么情况下索引不会被命中
like '%xxxx%' 时不会命中 ， 但是like'xxx%'的时候可以
字段有null值的时候(高本版可以，主要看查找成本)
索引列对其使用了mysql自带函数的时候
not in 或者 ！= 的时候(高本版可以，主要看查找成本)
字符串字段添加引号
a or b          如果a有索引但是b没有 索引不会被用到
select * from table where a = 1; a有索引，但是不一定会走索引  优化器可能会觉得扫描更快， 但是如果select a的话就会走索引



#### mysql null
不能使用=,<,>这样的运算符
对null做算术运算的结果都是null，
count时不会包括null行等，
null比空字符串需要更多的存储空间等。




####php超时
nginx 
fastcgi_connect_timeout 配置对应超时时间 连接
fastcgi_read_timeout 读超时
fastcgi_send_timeout 写超时

proxy   代理超时


php-fpm
request_terminate_timeout   配置请求最大时间

php.ini
max_execution_time 最大执行时间(当php-fpm配置了的时候 这个不生效)  或者php的safe_mode如果打开了这个也不会生效




####php自身异常错误捕获
E_PARSE 或者 E_ERROR使用try catch 捕获 或者set_expection_handler()捕获  php7之后的通用的错误接口thowable 等价于  Expection 和 Error
deprecated(弃用函数)  notice  worning  E_USER_用户自己定义      其他notice级别错误可以使用 set_error_handler()进行捕获
若没有相应处理 ， 错误将提交至php标准流程， 根据 error_reporting  dispaly_error error_log  logs_error的设定进行处理
trigger_error() 用户手动触发错误





####mysql  explain 解释
type   all | index |  range | null  all代表全表扫描 最坏的情况
key     代表使用到的索引
key_len 索引长度
possible_key    可能使用到的索引
row     实际扫描的行数，越小越好
extra
    using index  使用到索引
    using temporary 使用到了临时表  常见order by 或者group by
    using where  表示mysql存储引擎讲数据返回给服务器后再通过where条件进行过滤

如果possible_key有索引但是并没有用到  可以使用 force index() 强制使用索引


####解决hash冲突
开发定址法
链表法
hash碰撞使得hash表退化成单链表  复杂度从O(1)变成O(N)  限制post长度 和请求的参数个数(max_input_vars)


####解决跨域
jsonp
增加响应头
使用代理的方式



####trait 优先级
当前类会覆盖trait中的方法，  trait会覆盖继承的父类的方法



####对数组去除空元素， 去重， 排序， 重新索引键
array_filter($arr) 使用回调的方式处理数组中的每一个的元素，如果没有回调函数则默认清除数组中等价于false的元素
array_unique($arr) 数据去重
rsort($arr) 数组排序
array_values($arr) 获取所有的valuse


####统计一个文件中ip出现的次数并排序
grep -io '/ip的正则表达式/' ip.txt | uniq -c | sort -rn | head -6





####xss  csrf攻击
xss (css) 跨站脚本攻击   
对客户端输入的内容进行验证和转义， 对服务端的输出进行检查

csrf 伪请求攻击  
增加token验证
增加验证码





####数据库分库分表原则
1  尽量不拆分，成本很高
2  尽可能的选择最合适的切分维度
3  尽量避免有多表关联查询的地方
4  尽量避免事务分布
5  考虑拆分之后的数据统计问题




####交换两个变量的值不使用新的变量
$a = 1;
$b = 2;
list($a, $b) = [$b, $a];




####mysql手动加锁
# 表锁
lock tables  tablename lock_type(READ || WRITE) , tablename lock_type
unlock table tablename

# 行锁
必须在事务中
select 语句后面加上  for update;




####php socket
socket_create()     创建
socket_bind()       绑定
socket_listen();    监听




####redis 数据类型  底层 区别
list 和 zset 都是有顺序的
list是通过链表实现的， 取两端的数据速度更快
zset 是通过散列表加跳跃表实现的 即使读中间的部分也很快  O(logN)
list 不能随意调换元素的位置  但是zset可以(修改分数)

zset 和  set 都是集合 都是基于hashtable   O(1)
zset 是有顺序的
zset 多了一个score字段  而且不同元素的可以有相同的score


string
底层的三种可能类型(SDS)
int    数字
raw    大于32字节的字符串
embstr 小于32字节的字符串



####堆和栈的区别
栈是在编译期间就分配好的内存空间， 所以必须在代码中明确定义栈的大小

堆的内存空间是在执行的时候动态生成的，可以根据程序执行情况确定要分配给堆的内存大小






#### 抽象类  接口  区别
接口是抽象类的一种 都不能被实例化只能被继承
抽象类  abstract
接口    interface
接口只能定义常量， 方法必须声明为public ,  使用implements继承， 可以继承多个接口， 其中的所有方法都没有方法体而且必须被重写
抽象类可以定义数据，方法声明不能为private ,使用extenns继承， 只能继承一个抽象类，其中所有地方方法
抽象类至少有一个抽象方法 用abstract声明， 同样不能有方法体， 但是其他非抽象的方法可以有方法体




























