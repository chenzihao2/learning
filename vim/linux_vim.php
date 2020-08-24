set showmode											 可以显示当前模式
x														 删除一个字符
dd														 删除一行
J(大写)													 下面一行拼到上面 成一行
u(undo)													 撤销
U(大写)													 恢复到最初状态
ctrl + r												 撤销的撤销
a(append)												 光标后插入
o(小写)													 光标的下面的一行开始插入     大写为上一行开始插入
9k														 向上移动9行
3x														 删除三个字符
ZZ														 等价:wq 但是更方便
:x														 等价:wq 但是更方便
dG														 从当前删到文件结束
w(word)													 光标会移动到下个单词的首字符
b(backword)												 光标会移动到上一个单词的首字符 和w相反
e(end of word)											 光标会移动到下一个单词的最后一个字符上 相反命令为 ge
$														 移动至行尾   2$ 表示下一行的行尾
^														 移动到行首   非空白字符 0是行首 空的也会到
f(find)													 向后单字符搜索命令 相反方向是 F (;下一个    ,上一个)
t(to)													 向右单字符搜索 到达搜索字符的前一个字符上 相反方向是T
%														 括号匹配
G														 定位到最后一行
gg														 定位到第一行
90%														 定位到90%的位置
CTRL+g													 显示多少行 以及百分比信息
CTRL+u													 上滑
CTRL+d													 下滑
CTRL+e													 下滑
CTRL+y													 上滑
CTRL+f													 下翻一屏
CTRL+b													 上翻一屏
zz														 当前行至置于屏幕中间
zt(top)													 顶端
zb(bottom)												 置于低端
/字符串													 向下搜索
?字符串													 向上搜索    特殊字符具有特殊意义无法直接搜索 需要加\ 反斜杠   如 $ ^  等 :set ignorecase 搜索不区分大小写   /上下箭头查看搜索的历史记录
*														 向下搜索当前光标所在的单词  #  向上搜索       set hlsearch(height light) 设置搜索高亮  :nohlsearch 仅关闭当前高亮  :set wrapscan 到达文件最后会从头开始 :set incsearch 不需要回车
正则表达式搜索											 ^string  string$  开头  结尾 其他正则都支持
` `														 进行跳转时 回到跳转前的位置
CTRL+o(old)												 跳转到前一次光标停留的位置
:jumps													 查看跳过的位置
m(mark)													 定一个标记 如 mb  
' + b(打的标记)											 跳转到m的标记
:marks													 查看所有的标记
' + ]  													 跳转到最后一次修改的位置.
dw(delete word)											 删除一个单词 可计数   d3w = 3dw != 3d2w
d$													   	 删除光标到行尾
d^														 删除光标到行首
cw														 删除当前单词并进入insert模式
cc														 删除当前行并进入insert模式
快捷命令												 x = dl   X = dh   D = d$    C = c$  s = cl  S = cc
r(replace)												 替换单个字符 会一直处于normal模式 可计数
.														 重复上一次的修改操作  只能重复修改命令 
CTRL + v												 可视化 块模式  方便垂直操作
o														 块模式下 调整光标位置 矩形对角 O相反对角
p(put)													 删除的文本复制移动至当前行的下一行 P放在当前行的上一行 可计数
y(yanking)												 复制  可计数 yy 复制一整行 y$ 复制光标到行尾 Y 复制一整行
daw(delete a word)               						 光标位于单词中间删除单词.
diw(delete inner word) 									 同上 但是不删除单词两边的空格
cis(change inner sentence)     							 修改一整个句子 以英文句号做分隔 dis相似
R(Replace mode)  										 输入的字符会替换光标下的字符
~ 														 将光标下的字符大写并转移至下一个字符
I														 在本行第一个非空白字符处进入Insert模式
A														 在本行的最后一个非空白字符处进入Insert模式
:write filename											 将当前内容写入一个文件
:read filepath 											 简单来说是复制了一整文件 :$read filepath 追加到文件的最后 :0read 追加到文件开头
:map 													 映射 例如 :map <F5> i{<Esc>la}<Esc>
vim 多个文件											 :args(arguments) 查看当前打开的文件的列表  :next 切换文件下一个 :previous 上一个 :last 最后一个 :first 第一个
:edit filename											 打开另一个文件
q(register name)                                         命名寄存器a-z  q + 寄存器名例a  开始记录操作   按下q结束记录    按下@(register name) 将刚才记录的操作重新来一边 @@重复上一次的宏
:[range]subtitute/from/to/[flags]             			 全局替换 [range]作用范围 %表示全部 缺省代表当前行     [flags]标记 g(global)改变当前作用范围内的所有 c(confirm) 执行每次替换前确 操作 缺省代表只替换一次 
:[range]subtitute=from=to=[flags](字符转义时的另一种写法)subtitute可简写为s :%s/from/to/g      :.,$s/this/that/g 当前行到最后一行    :20,30s/from/to/g 20行到30行   :20s/from/to/g 对20行进行操作 :'<,‘>s/from/to/g visual下选择的区域
 														 注释 :[rang]s/^/\/\//g
:[range]global/{pattern}/{command}                       :g=//=d  整个文件中包含//的行进行删除操作   默认作用于为整个文件 操作单位是行
Visual Block 模式 										 块模式下选择的区域后  I在所有行首  A在所有行尾   添加同样的文本 用来注释比较合适！！! 可以选中某列 c 进行块修改 C 会删除至行尾 ~小写变大写大写变小写 U 全大写 u 全小写 r替换全部
gu + 位移												 小写   U大写	gugu整行小写简写为guu 
linux外部命令
sort < file1 >fill2                                      将文件1的文本进行排序并放去file2中
wc file													 统计行数 单词数 字符数
\<word\>												 匹配一个单词 开头和结尾都仅限于这个单词
替换多个文件中的目标									 vim 多个文件  qa开始记录宏 :%s替换命令 :wn保存并进入下一个文件 q 停止记录宏 计数@a 多次执行宏操作 实现替换多个文件中的目标
消除多余的空格行										 块模式下选中   :%global/^\s*$/d 

                        #######new#########
:%s/$/new_word/g                                         替换所有行尾
:vsp new_file                                            垂直分屏(ctrl+w+[h,j,k,l]切屏,  ctrl+w+[H,J,K,L]切换屏幕位置)
ctrl + u                                                 删除一行(刚刚输入的)
ctrl + w                                                 删除一个单词(刚刚输入的)
ctrl + c | [                                             进入normal模式
gi                                                       快速回到上一次insert模式的位置   
:tabe newfile                                            以新的文件打开一个tab页(gt切换tab, :tabc退出当前tab)

vi | ci | di + " | { | ' | [                             直接操作对应符合内的内容
"(a-z|1-100|*)y                                          复制到对应寄存器
:reg                                                     查看所有寄存器
