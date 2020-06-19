export TOOL_HOME=/usr/local
PATH=$PATH:$TOOL_HOME/git/bin
PATH=$PATH:$TOOL_HOME/mysql/bin
PATH=$PATH:$TOOL_HOME/php/bin 
PATH=$PATH:$TOOL_HOME/php/sbin 
PATH=$PATH:$TOOL_HOME/redis/src/ 
PATH=$PATH:$TOOL_HOME/node/bin
PATH=$PATH:$TOOL_HOME/zookeeper/bin
PATH=$PATH:$TOOL_HOME/mongodb/bin
PATH=$PATH:$TOOL_HOME/bin
PATH=$PATH:$TOOL_HOME/nginx/sbin
export PATH

export PS1='[\u@ \W]^_^ '







alias l='ls -lth'
alias sb='sudo su'
alias s='sudo env PATH=$PATH'
alias gs='git status'
alias ga='git add'
alias gc='git commit'
alias gf='git diff'
alias mysqlr='mysql -u root -p'
alias zkc='zkCli.sh'
