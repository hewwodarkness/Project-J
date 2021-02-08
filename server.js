import {
  GraphQLList,
  GraphQLObjectType,
  GraphQLSchema,
  GraphQLString,
} from 'graphql';
 
const BASE_URL = 'https://api.joyreactor.cc/graphql';
 
function fetchResponseByURL(relativeURL) {
  return fetch(`${BASE_URL}${relativeURL}`).then(res => res.json());
}
 
function fetchPeople() {
  return fetchResponseByURL('/people/').then(json => json.people);
}
 
function fetchPersonByURL(relativeURL) {
  return fetchResponseByURL(relativeURL).then(json => json.person);
}
 
const PersonType = new GraphQLObjectType({
  /* ... */
  fields: () => ({
    /* ... */
    friends: {
      type: new GraphQLList(PersonType),
      resolve: person => person.friends.map(fetchPersonByURL),
    },
  }),
});
 
const QueryType = new GraphQLObjectType({
  /* ... */
  fields: () => ({
    allPeople: {
      type: new GraphQLList(PersonType),
      resolve: fetchPeople,
    },
    person: {
      type: PersonType,
      args: {
        id: { type: GraphQLString },
      },
      resolve: (root, args) => fetchPersonByURL(`/people/${args.id}/`),
    },
  }),
});
 
export default new GraphQLSchema({
  query: QueryType,
});