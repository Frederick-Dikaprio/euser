import ListEntry from "./ListEntry";
import { useEffect, useState } from "react";
import { useGlobalContext } from "../context";

export default function UserInfo() {
    const { userToView, hideUser } = useGlobalContext();

    const [user, setUser] = useState();

    useEffect(() => {
        async function getUser(userToView) {
            try {
                const response = await fetch(`/backend/user/${userToView}`);
                const user = await response.json();
                setUser(user);
            } catch (error) {
                console.log(error);
            }
        }
        if (userToView) {
            getUser(userToView);
        } else {
            setUser(null);
        }
    });

    return (
        <div className="rounded-md bg-white px-4 py-4">
            <h2 className="mb-3 text-lg font-bold">Informations du parrain</h2>
            {user ? (
                <div
                    className="flex flex-col gap-y-2"
                    style={{ rowGap: "0.5rem" }}
                >
                    <ListEntry label="CIP" value={user.cip} />
                    <ListEntry label="Alias" value={user.alias} />
                    <ListEntry label="Nom" value={user.last_name} />
                    <ListEntry label="Prenom" value={user.first_name} />
                    <ListEntry label="Telephone" value={user.phone} />
                </div>
            ) : (
                <p className="text-base">Loading...</p>
            )}
            <button
                className="mt-3 rounded-sm bg-indigo-700 px-4 py-1 text-white"
                onClick={() => {
                    hideUser();
                }}
            >
                Ok
            </button>
        </div>
    );
}
