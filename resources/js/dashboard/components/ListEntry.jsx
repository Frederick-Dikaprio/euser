export default function ListEntry({ label, value }) {
    return (
        <div>
            <span className="inline-block w-24">{label}</span>
            <span className="inline-block">{value}</span>
        </div>
    );
}
