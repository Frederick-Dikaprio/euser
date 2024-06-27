import { useGlobalContext } from "../context";
import TableList from "../components/TableList";
import InfoButton from "../components/InfoButton";

export default function SubscriptionsOfGodfather({ subscriptions }) {
    const { setSelectedTab, showSubscriptionAssignmentModal } =
        useGlobalContext();

    return (
        <TableList>
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Bouquet</th>
                    <th>Langue</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Type de bouquet</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                {subscriptions.map((subscription, index) => (
                    <tr key={index + 1}>
                        <td>{index + 1}</td>
                        <td></td>
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
                            {new Date(subscription.ends_at).toLocaleDateString(
                                "fr-FR",
                                {
                                    weekday: "long",
                                    year: "numeric",
                                    month: "long",
                                    day: "numeric",
                                }
                            )}
                        </td>
                        <td></td>
                        <td>
                            <InfoButton
                                clickEventHandler={() => {
                                    setSelectedTab("bouquet");
                                }}
                            />
                        </td>
                        <td>
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
                        </td>
                    </tr>
                ))}
            </tbody>
        </TableList>
    );
}
