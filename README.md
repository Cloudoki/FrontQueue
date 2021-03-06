# FrontQueue
The Laravel Queue foreground jobs extension.

The FrontQueue package enables 3 states of job tasking.

### MQ
The Message Queue default state is what this package is constructed for.
One can send a task through a foreground enabled Message Queue, waiting for and returning it's response.

By default, FrontQueue will try to contact a Gearman server, hosted on the same machine.

### Local
For development or local machines, one can communicate through shell script.

Avoid using the Local (sync) mode in production environments.

### Folded 
Folded state is an API setup where BLM is folded into the API (for small or POC projects).

The folded state is ONLY for poc projects, since it requires additional resources without advantage.
Enable it in config, by adding:

`'stacked'=> false,`

### Configuration
This package publishes the configuration file `config/frontqueue.php` and allows for the Gearman servers to be defined in the `.env` file using the `FRONTQUEUE_GEARMAN_SERVERS` environment variable.

The config value is expected to be in the format `host1:port1[,host2:port2[,...]]` since the connection is performed with the `GearmanClient::addServers()` method.
