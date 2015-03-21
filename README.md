# ECBdocker
ECB docker is just a PHP challenge application in a docker container tunelko/ecbdocker.

Building the container:
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



