import { useGlobalContext } from "../context";
import TableList from "../components/TableList";
import InfoButton from "../components/InfoButton";

export default function UserSubscriptions({ subscriptions }) {
    const { showUser, authenticatedUser, showSubscriptionAssignmentModal } =
        useGlobalContext();

    return (
        <TableList>
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Nom du Parrain</th>
                    <th>Langue</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Tuteur</th>
                    <th>Etat</th>
                </tr>
            </thead>
            <tbody>
                {subscriptions.map((subscription, index) => {
                    let sponsor;

                    if (subscription.user_id == authenticatedUser.id) {
                        sponsor =
                            authenticatedUser.first_name +
                            " " +
                            authenticatedUser.last_name;
                    } else {
                        sponsor =
                            subscription.owner.first_name +
                            " " +
                            subscription.owner.last_name;
                    }

                    let can_assign_subscription =
                        subscription.user_id == authenticatedUser.id
                            ? true
                            : false;

                    return (
                        <tr key={index + 1}>
                            <td>{index + 1}</td>
                            <td>
                                {sponsor}
                                <InfoButton
                                    type="cell"
                                    clickEventHandler={() => {
                                        showUser(subscription.user_id);
                                    }}
                                />
                            </td>
                            <td>{subscription.name}</td>
                            <td>
                                {new Date(
                                    subscription.created_at
                                ).toLocaleDateString("fr-FR", {
                                    weekday: "long",
                                    year: "numeric",
                                    month: "long",
                                    day: "numeric",
                                })}
                            </td>
                            <td>
                                {new Date(
                                    subscription.ends_at
                                ).toLocaleDateString("fr-FR", {
                                    weekday: "long",
                                    year: "numeric",
                                    month: "long",
                                    day: "numeric",
                                })}
                            </td>
                            <td>
                                <InfoButton
                                    type="cell"
                                    clickEventHandler={() => {
                                        showUser(subscription.user_id);
                                    }}
                                />
                            </td>
                            <td>{subscription.stripe_status}</td>
                            <td>
                                {can_assign_subscription && (
                                    <button
                                        className="rounded-md bg-indigo-700 px-4 py-2 text-white"
                                        onClick={() => {
                                            showSubscriptionAssignmentModal(
                                                subscription.id
                                            );
                                        }}
                                    >
                                        Attribuer
                                    </button>
                                )}
                            </td>
                        </tr>
                    );
                })}
            </tbody>
        </TableList>
    );
}
