"vim run command"
filetype off 
set rtp+=~/.vim/bundle/vundle
call vundle#begin()
Plugin 'VundleVim/Vundle.vim'
"Plugin 'stanangeloff/php.vim'
"Plugin 'shawncplus/phpcomplete.vim'
"Plugin  'Valloric/YouCompleteMe'


let g:ycm_server_python_interpreter='/usr/bin/python'
let g:ycm_global_ycm_extra_conf='~/.vim/.ycm_extra_conf.py'

syntax on           "语法高亮
set nu              "显示行号
colorscheme srcery-drk        "设置主题
set cursorline
highlight CursorLine  cterm=NONE ctermbg=black ctermfg=NONE guibg=green guifg=green"高亮当前行
set whichwrap+=<,>,h,l "允许backspace和光标键跨越行边界
set autoindent		 "自动缩进
set cindent          "自动缩进
set shiftwidth=4
set smartindent "智能对齐
set autoindent "自动对齐
set tabstop=4        "缩进宽度
set noexpandtab      " 不要用空格代替制表符
set ignorecase       "搜索忽略大小写
set hlsearch 		"搜索字符高亮
set incsearch       "自动搜索 
set nobackup
set noswapfile       "不产生临时文件



set nocompatible "和vi不一致
set fencs=utf-8,ucs-bom,shift-jis,gb18030,gbk,gb2312,cp936
set termencoding=utf-8
set encoding=utf-8
set fileencodings=ucs-bom,utf-8,cp936
set fileencoding=utf-8
"新建.c,.h,.sh,.java文件，自动插入文件头
autocmd BufNewFile *.cpp,*.[ch],*.sh,*.java,*.php exec ":call SetTitle()"
""定义函数SetTitle，自动插入文件头
func SetTitle()
    "如果文件类型为.sh文件
    if &filetype == 'sh'
        call setline(1,"\#########################################################################")
        call append(line("."), "\# File Name: ".expand("%"))
        call append(line(".")+1, "\# Author: chenzihao")
        call append(line(".")+2, "\# Created Time: ".strftime("%c"))
        call append(line(".")+3, "\#########################################################################")
        call append(line(".")+4, "\#!/bin/bash")
        call append(line(".")+5, "")
    endif
    if &filetype == 'cpp'
        call append(line(".")+4, "#include<iostream>")
        call append(line(".")+5, "using namespace std;")
        call append(line(".")+6, "")
    endif
    if &filetype == 'c'
        call append(line(".")+4, "#include<stdio.h>")
        call append(line(".")+5, "")
    endif
        if &filetype == 'php'
             call setline('1', "<?php")
             call append(line("."), "/*************************************************************************")
        call append(line(".")+1, "    > File Name: ".expand("%"))
        call append(line(".")+2, "    > Author: chenzihao")
        call append(line(".")+3, "    > Created Time: ".strftime("%c"))
        call append(line(".")+4, " ************************************************************************/")
        call append(line(".")+5, "")
        endif
    "新建文件后，自动定位到文件末尾
    autocmd BufNewFile * normal G
endfunc

"自动补全
:inoremap ( ()<ESC>i
:inoremap ) <c-r>=ClosePair(')')<CR>
:inoremap { {<CR>}<ESC>O
:inoremap } <c-r>=ClosePair('}')<CR>
:inoremap [ []<ESC>i
:inoremap ] <c-r>=ClosePair(']')<CR>
:inoremap " ""<ESC>i
:inoremap ' ''<ESC>i
function! ClosePair(char)
    if getline('.')[col('.') - 1] == a:char
        return "\<Right>"
    else
        return a:char
    endif
endfunction
filetype plugin indent on
set completeopt=longest,menu

"set tags=tags;
"set autochdir
au BufReadPost * if line("'\"") > 0|if line("'\"") <= line("$")|exe("norm '\"")|else|exe "norm $"|endif|endif
map QQ :q!<Enter>

function! <SID>PhpCheck()
let fname = expand("%")
let ret=system("/usr/bin/php -ddisplay_errors=Off -l ".fname." | awk '{if($0 ~ /^No syntax errors/)print -1,$0;else {mt=match($0,/on line [0-9]+/);line=substr($0,RSTART+8,RLENGTH-8);print line,$0;}}'")
let errno = substitute(ret,'^\(-\?\d\+\)','\1','')
let errmsg = substitute(ret,'^\d\+\s\+\(.*\)','\1','')
if(errno>-1)
    call cursor(errno,0)
    echon errmsg
endif
endfunction
au BufWritePost,FileWritePost *.php :call <SID>PhpCheck()



function! CheckSyntax()
 if &filetype!="php"
 echohl WarningMsg | echo "Fail to check syntax! Please select the right file!" | echohl None
 return
 endif
 if &filetype=="php"
 " Check php syntax
 setlocal makeprg=\"php\"\ -l\ -n\ -d\ html_errors=off
 " Set shellpipe
 setlocal shellpipe=>
 " Use error format for parsing PHP error output
 setlocal errorformat=%m\ in\ %f\ on\ line\ %l
 endif
 execute "silent make %"
 set makeprg=make
execute "normal :"
execute "copen"
endfunction
map php  :call CheckSyntax()<CR>
"au BufWritePost,FileWritePost *.php :call CheckSyntax()



