# Para definir el esquema y resolver queries.
from ariadne import QueryType, make_executable_schema,load_schema,load_schema_from_path
# Para integrar Ariadne con un servidor ASGI.
from ariadne.asgi import GraphQL
import uvicorn  # Importamos Uvicorn para ejecutar el servidor ASGI desde el script.
from resolvers import resolve_hello, resolve_greeting, resolve_getPerson

type_defs = load_schema_from_path("schema.graphql")
# Definir el tipo de consulta (query) en GraphQL
query = QueryType()

# Asignar los resolvers a los campos
query.set_field("HELLO",resolve_hello)
query.set_field("greeting",resolve_greeting)
query.set_field("getPerson",resolve_getPerson)

# Resolver para el campo "hello"
@query.field("hello")
def resolve_hello(_, info):
    # Respuesta que regresará este resolver.
    return "¡Hola Mundo!"  

# Crear el esquema ejecutable combinando los tipos y resolvers
schema = make_executable_schema(type_defs,query)

app = GraphQL(schema)


if __name__ == "__main__":
    uvicorn.run(app,host="127.0.0.1",port=8000)
