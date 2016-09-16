## Application Services

1
"Application Services are the interface used by the outside world, where the outside world can’t communicate via our Entity objects, but may have other representations of them.  Application Services could map outside messages to internal operations and processes, communicating with services in the Domain and Infrastructure layers to provide cohesive operations for outside clients.  Messaging patterns tend to rule Application Services, as the other service layers don’t have a reference back out to the Application Services.  Business rules are not allowed in an Application Service, those belong in the Domain layer." Jimmy Bogard

2
Business rules are not allowed in an Application Service, those belong in the Domain layer.

