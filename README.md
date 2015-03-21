# ECBdocker
ECB docker is just a PHP challenge testing application with docker. 

### Start

Clone this repository
```sh
$ git clone https://github.com/tunelko/ECBdocker.git
```

Build the container:
```sh
$ docker build --force-rm=true --no-cache=true --rm=true  -t tunelko/ecbdocker .
```
After building, just run it:
```sh
$ docker run -d -p 8443:80 tunelko/ecbdocker
```

And see if is running:
```sh
$ docker ps
CONTAINER ID        IMAGE                      COMMAND             CREATED             STATUS              PORTS                  NAMES
688cfbc68597        tunelko/ecbdocker:latest   /run.sh             6 minutes ago       Up 6 minutes        0.0.0.0:8443->80/tcp   loving_davinci
```
### Start

Use: 
Just point to http://YOUR_PUBLIC_IP:8443/index.php and start ECB challenge.  

### Challenge

The challenge is about ECB Mode encryption. Just login as tunelko ;)

### References

[Docker repository](https://registry.hub.docker.com/u/tunelko/ecbdocker/)



