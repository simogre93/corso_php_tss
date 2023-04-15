import { getUsers } from "./UserService.js";
import { usersList, usersTable } from "./RenderView.js";

const users = await getUsers()
usersTable(users, "lista_utenti_2")
usersList(users, "lista_utenti")
//console.log(users)