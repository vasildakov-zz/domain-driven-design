## Domain Service

Services are first-class citizens of the domain model.  When concepts of the model would distort any Entity or Value Object, a Service is appropriate.  From Evans’ DDD, a good Service has these characteristics:

1. The operation relates to a domain concept that is not a natural part of an Entity or Value Object

2. The interface is defined in terms of other elements in the domain model

3. The operation is stateless

Domain services are the coordinators, allowing higher level functionality between many different smaller parts.  These would include things like OrderProcessor, ProductFinder, FundsTransferService, and so on.  Since Domain Services are first-class citizens of our domain model, their names and usages should be part of the Ubiquitous Language.  Meanings and responsibilities should make sense to the stakeholders or domain experts. [Jimmy Bogard]


"When a significant process or transformation in the domain is not a natural responsibility of an ENTITY or VALUE OBJECT, add an operation to the model as standalone interface declared as a SERVICE. Define the interface in terms of the language of the model and make sure the operation name is part of the UBIQUITOUS LANGUAGE. Make the SERVICE stateless."
Eric Evans, Domain-Driven Design