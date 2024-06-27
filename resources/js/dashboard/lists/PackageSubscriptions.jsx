import TableList from "../components/TableList";

export default function PackageSubscriptions() {
    return (
        <TableList>
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Alias de l'usager</th>
                    <th>Nom de l'usager</th>
                    <th>Langue</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Suspension</th>
                </tr>
            </thead>
            <tbody></tbody>
        </TableList>
    );
}
