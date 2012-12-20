# Vagrant PS1

Provides visual feedback if a Vagrant virtual machine has been launched from
the current working directory.

When properly configured you should see a green ‣ in your PS1:

![](http://img16.imageshack.us/img16/6660/vagrantps1.png)

## Requirements

* `php` binary must be available in your $PATH to execute script that
  compares current dir VM to running VMs

## Installation

1. Clone directory to your somewhere in your home directory. Suggest a
   hidden directory or your own versioned dotfiles directory. If you're
   not picky and just want to follow along, clone this repository to
   `~/.vagrant_ps1`:
```
git clone https://github.com/johnkary/vagrant_ps1.git ~/.vagrant_ps1
```

2. The script `dir.sh` contains a bash function `\$(__vagrant_dir)` that you
   want to add to your PS1. Add the following lines to `~/.bash_profile` which
   will add the green ‣ at the start of your PS1 line when a Vagrant VM
   has been booted from that directory.
```bash
source ~/.vagrant_ps1/dir.sh
export PS1="\$(__vagrant_dir)$PS1"
```

3. Open a new bash session or source your `~/.bash_profile` from your
   currently open session:
```
$ source ~/.bash_profile
```

4. Change into a directory where you have a `Vagrantfile` and launch the
   VM. You should then see a green ‣ in your PS1.
```
$ cd myproject
$ vagrant up
‣$
```

## TODO

* Port current PHP script to Ruby so an additional binary is not needed.
  Vagrant already needs `ruby` to run, so the script that checks for it
  should also be written in that language.
