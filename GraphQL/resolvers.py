# Función resolver para el campo 'HELLO'
def resolve_hello(_, info):
    return "¡Hola Mundo!"

# Función resolver para el campo 'greeting'
def resolve_greeting(_, info, name):
    return f"¡Hola, {name}!"

# Función resolver para el campo 'getPerson'
def resolve_getPerson(_, info, id):
    # Simulamos una base de datos con una lista de personas
    people = [
        {"id": 1, "name": "Juan", "age": 30},
        {"id": 2, "name": "María", "age": 25},
        {"id": 3, "name": "Pedro", "age": 40}
    ]
    # Buscamos a la persona por ID
    person = next((person for person in people if person["id"] == id), None)
    return person
