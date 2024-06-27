import ListEntry from "./ListEntry";
import { useGlobalContext } from "../context";

export default function UserProfile() {
    const { authenticatedUser, hideProfile } = useGlobalContext();

    return (
        <div
            id="userProfile"
            className="overflow-hidden rounded-md bg-white px-4 py-4"
        >
            <h2 className="mb-3 text-lg font-bold">Informations de l'usager</h2>
            <div className="flex flex-col" style={{ rowGap: "0.5rem" }}>
                <ListEntry label="Nom" value={authenticatedUser.last_name} />
                <ListEntry
                    label="Prenom"
                    value={authenticatedUser.first_name}
                />
                <ListEntry label="Courriel" value={authenticatedUser.email} />
                <ListEntry label="Telephone" value={authenticatedUser.phone} />
            </div>
            <button
                className="mt-3 rounded-sm bg-indigo-700 px-4 py-1 text-white"
                onClick={() => {
                    hideProfile();
                }}
            >
                Fermer
            </button>
        </div>
    );
}
