import axios from "axios";
import Modal from "../components/Modal";
import { useGlobalContext } from "../context";

export default function PackageExpiryDateExtensionModal() {
    const {
        authenticatedUser,
        subscriptionToAssign,
        setSubscriptionAssignmentModalVisibility,
    } = useGlobalContext();

    async function assignSubscription(event) {
        event.preventDefault();

        const form = event.currentTarget;
        const alias = form.querySelector("#alias").value;

        if (!alias) {
            return false;
        }

        const apiHostUrl = document.querySelector("#apiHostUrl").value;
        const token = document.querySelector("#authToken").value;
        const message = document.querySelector("#message");

        var user;

        try {
            const axiosResponse = await axios.post(
                apiHostUrl + "/api/v1/users/search",
                { alias: alias },
                {
                    headers: {
                        "X-CSRF-TOKEN": token,
                        Authorization: "Bearer " + token,
                    },
                }
            );

            user = axiosResponse.data.data.user;
        } catch (error) {
            message.innerHTML = "Cette utilisateur n'existe pas !!!";
            return false;
        }

        const url =
            apiHostUrl +
            "/api/v1/users/" +
            authenticatedUser.id +
            "/subscriptions/" +
            subscriptionToAssign +
            "/assign";

        try {
            await axios.post(
                url,
                { recipient_id: user.id },
                {
                    headers: {
                        "X-CSRF-TOKEN": token,
                        Authorization: "Bearer " + token,
                    },
                }
            );
        } catch (error) {
            message.innerHTML = error.response.data.reason;
            return false;
        }

        setSubscriptionAssignmentModalVisibility(false);
    }

    return (
        <Modal>
            <div className="rounded-md bg-white px-4 py-4">
                <h2 className="mb-2 text-lg font-bold">
                    Attribuer un abonnement
                </h2>
                <div id="message" className="mb-2 text-red-500"></div>
                <form
                    className="space-y-4"
                    onSubmit={(e) => assignSubscription(e)}
                >
                    <div className="space-y-2">
                        <label htmlFor="email" className="block">
                            Veuillez entrer l&apos;alias de l&apos;utilisateur
                        </label>
                        <input
                            type="text"
                            name="alias"
                            id="alias"
                            className="w-full rounded-md border-2 border-gray-300 px-2 py-2 focus:border-gray-400"
                        />
                    </div>
                    <input
                        type="hidden"
                        name="subscription"
                        value={subscriptionToAssign}
                    />
                    <div className="space-x-4">
                        <button type="submit" className="modal-button">
                            Attribuer
                        </button>
                        <button
                            className="modal-button"
                            onClick={() => {
                                document.querySelector("#message").innerHTML =
                                    "";
                                setSubscriptionAssignmentModalVisibility(false);
                            }}
                        >
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </Modal>
    );
}
