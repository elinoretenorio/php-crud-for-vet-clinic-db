curl -X GET "localhost:8080/vets"

curl -X POST "localhost:8080/vets" -H 'Content-Type: application/json' -d'
{
  "first_name": "newspaper",
  "last_name": "by"
}
'

curl -X POST "localhost:8080/vets/8932" -H 'Content-Type: application/json' -d'
{
  "first_name": "newspaper",
  "id": 8932,
  "last_name": "by"
}
'

curl -X GET "localhost:8080/vets/8932"

curl -X DELETE "localhost:8080/vets/8932"

# --

curl -X GET "localhost:8080/specialties"

curl -X POST "localhost:8080/specialties" -H 'Content-Type: application/json' -d'
{
  "name": "sing"
}
'

curl -X POST "localhost:8080/specialties/7544" -H 'Content-Type: application/json' -d'
{
  "id": 7544,
  "name": "sing"
}
'

curl -X GET "localhost:8080/specialties/7544"

curl -X DELETE "localhost:8080/specialties/7544"

# --

curl -X GET "localhost:8080/vet-specialties"

curl -X POST "localhost:8080/vet-specialties" -H 'Content-Type: application/json' -d'
{
  "specialty_id": 1630,
  "vet_id": 732
}
'

curl -X POST "localhost:8080/vet-specialties/9321" -H 'Content-Type: application/json' -d'
{
  "id": 9321,
  "specialty_id": 1630,
  "vet_id": 732
}
'

curl -X GET "localhost:8080/vet-specialties/9321"

curl -X DELETE "localhost:8080/vet-specialties/9321"

# --

curl -X GET "localhost:8080/types"

curl -X POST "localhost:8080/types" -H 'Content-Type: application/json' -d'
{
  "name": "loss"
}
'

curl -X POST "localhost:8080/types/7665" -H 'Content-Type: application/json' -d'
{
  "id": 7665,
  "name": "loss"
}
'

curl -X GET "localhost:8080/types/7665"

curl -X DELETE "localhost:8080/types/7665"

# --

curl -X GET "localhost:8080/owners"

curl -X POST "localhost:8080/owners" -H 'Content-Type: application/json' -d'
{
  "address": "billion",
  "city": "skin",
  "first_name": "leg",
  "last_name": "during",
  "telephone": "visit"
}
'

curl -X POST "localhost:8080/owners/7189" -H 'Content-Type: application/json' -d'
{
  "address": "billion",
  "city": "skin",
  "first_name": "leg",
  "id": 7189,
  "last_name": "during",
  "telephone": "visit"
}
'

curl -X GET "localhost:8080/owners/7189"

curl -X DELETE "localhost:8080/owners/7189"

# --

curl -X GET "localhost:8080/pets"

curl -X POST "localhost:8080/pets" -H 'Content-Type: application/json' -d'
{
  "birth_date": "2021-10-02",
  "name": "own",
  "owner_id": 8218,
  "type_id": 6972
}
'

curl -X POST "localhost:8080/pets/4259" -H 'Content-Type: application/json' -d'
{
  "birth_date": "2021-10-02",
  "id": 4259,
  "name": "own",
  "owner_id": 8218,
  "type_id": 6972
}
'

curl -X GET "localhost:8080/pets/4259"

curl -X DELETE "localhost:8080/pets/4259"

# --

curl -X GET "localhost:8080/visits"

curl -X POST "localhost:8080/visits" -H 'Content-Type: application/json' -d'
{
  "description": "respond",
  "pet_id": 9153,
  "visit_date": "2021-09-30"
}
'

curl -X POST "localhost:8080/visits/61" -H 'Content-Type: application/json' -d'
{
  "description": "respond",
  "id": 61,
  "pet_id": 9153,
  "visit_date": "2021-09-30"
}
'

curl -X GET "localhost:8080/visits/61"

curl -X DELETE "localhost:8080/visits/61"

# --

