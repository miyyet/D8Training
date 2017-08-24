# Prerequisites on the host machine

The following lines concernes **your** computer. it does not concern the *serveur* or the *lxc*.

**DO NOT INSTALL** anything on the *server* or on the *lxc*.

You must have a workstation under [SmileBuntu](https://wiki.smile.fr/view/Systeme.ConfigPostes/ConfigUbuntu),
or at least install all the [Smile Packages](https://wiki.smile.fr/view/Adminsys/UbuntuSmilebuntu)
(like [smile-ca](https://wiki.smile.fr/view/Systeme/ConfigPostes/SmileSSLCertificates#How_to_install_in_Linux) package).

If you have the latest SmileBuntu, you have to install the following PHP extensions or packages in order to make it works:

+ php-zip
+ php-mbstring
+ php-curl
+ python-ldap

With the following command:

```
sudo apt-get install php-zip php-mbstring php-curl python-ldap
```

## For Hosting and Developers

The following lines are necessary for provisioning process. They concern Hosting and Developers.

+ LDAP:     You must install the **python-ldap** package
+ LDAP:     You must [upload your SSH key to the LDAP ](https://wiki.smile.fr/view/Systeme/UsingSmileLDAP#Upload_your_SSH_key_to_the_LDAP)
+ GIT:      You must install the **git** packages
+ GIT:      You must have your ssh key linked with your [git account](https://git.smile.fr/profile/keys)
+ Ansible:  You must [install and configure](https://wiki.smile.fr/view/Systeme/AnsibleIntro) Ansible 2.1

## Only For Developers 

The following lines are necessary to develop on the Drupal project. They concern only Developers.

+ LXC:      You must [install and configure](https://wiki.smile.fr/view/Dirtech/LxcForDevs) the lxc management tools 
+ Composer: You must [install](https://getcomposer.org/doc/00-intro.md#globally) Composer in the last stable version
+ Composer: You must [configure](https://wiki.smile.fr/view/PHP/HowToConfigComposer) Composer

```
{
    "github-oauth": {
        "github.com": "[Your Github key]"
    }
}
```

You can also add the following lines (not mandatory). 

+ Composer: Install [Prestissimo plugin](https://github.com/hirak/prestissimo#prestissimo-composer-plugin) to speed up composer install command
