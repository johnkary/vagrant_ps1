####
# Checks current directory for a running Vagrant virtual machine and outputs
# a visual indicator if running.
#
# Author: John Kary <john@johnkary.net>
####

__vagrant_dir ()
{
    local c=""
    local v=""

    V_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
    php ${V_DIR}/load.php

    OUT=$?
    if [ $OUT -eq 0 ];then
      local c="\e[0;32m"
      local v="‣"
    fi

    printf -- "$c$v"
}
