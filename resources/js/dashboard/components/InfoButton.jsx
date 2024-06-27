export default function InfoButton({ clickEventHandler, type = "" }) {
    let className = "px-2 py-1 bg-indigo-700 text-white";
    if (type === "cell") className += " absolute top-0 right-0";

    return (
        <button className={className} onClick={clickEventHandler}>
            ...
        </button>
    );
}
