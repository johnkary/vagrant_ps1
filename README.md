# Vagrant PS1

Provides visual feedback if a Vagrant virtual machine has been launched from
the current working directory.

## Installation

1. Clone directory to your `~/.vagrant.d` directory:

```
git clone git@github.com/johnkary/vagrant_ps1.git ~/.vagrant.d/
```

2. Source the `dir.sh` file in this repository into your `~/.bash_profile`:

```bash
source ~/.vagrant.d/vagrant_ps1/dir.sh
```

3. Add the bash function `\$(__vagrant_dir)` to your PS1 where you'd like the
    indicator to appear. This example would prepend it to your current PS1:

```bash
export PS1="\$(__vagrant_dir)$PS1"
```

4. Open a new bash session or source your `~/.bash_profile`:

```
$ source ~/.bash_profile
```
