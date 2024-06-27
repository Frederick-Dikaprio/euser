import { useGlobalContext } from "../context";

export default function ActionButton({ name, onClick }) {
    const { selectedTab } = useGlobalContext();

    let className = "font-bold py-2 px-4 rounded text-white";

    if (selectedTab === name.toLowerCase()) {
        className += " bg-indigo-800";
    } else {
        className += " bg-indigo-700 hover:bg-indigo-800";
    }

    return (
        <button
            className={className}
            onClick={onClick}
            style={{ textTransform: "capitalize" }}
        >
            {name}
        </button>
    );
}
